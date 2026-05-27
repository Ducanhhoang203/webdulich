<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    public function ask(Request $request)
    {
        try {
            $question = trim($request->input('question'));

            if ($question === '') {
                return response()->json([
                    'answer' => 'Bạn vui lòng nhập câu hỏi nhé.'
                ]);
            }

            /* ======================
               LẤY DỮ LIỆU WEBSITE
            ====================== */

            $context = '';

            $about = DB::table('about_sections')->first();
            if ($about && $about->content) {
                $context .= "GIỚI THIỆU CÔNG TY:\n{$about->content}\n\n";
            }

            $tours = DB::table('tbl_product')->get();
            foreach ($tours as $tour) {
                $context .= "TOUR: {$tour->product_name}\n";
                $context .= "GIÁ: {$tour->product_price}\n";
                $context .= "MÔ TẢ: {$tour->product_desc}\n\n";
            }

            $faqs = DB::table('tbl_faqschitiet')->limit(5)->get();
            foreach ($faqs as $faq) {
                $context .= "HỎI: {$faq->faqs_chitiet_cauhoi}\n";
                $context .= "ĐÁP: {$faq->faqs_chitiet_cautraloi}\n\n";
            }

            /* ======================
               GỌI OPENAI
            ====================== */

            $response = Http::withToken(config('services.openai.key'))
                ->timeout(20)
                ->post('https://api.openai.com/v1/responses', [
                    'model' => 'gpt-4o-mini',
                    'input' => [
                        [
                            'role' => 'system',
                            'content' => 'Bạn là chatbot cho website du lịch. Trả lời ngắn gọn, đúng dữ liệu.'
                        ],
                        [
                            'role' => 'user',
                            'content' => "DỮ LIỆU WEBSITE:\n$context\n\nCÂU HỎI:\n$question"
                        ]
                    ]
                ]);

            if (!$response->successful()) {
                Log::error('OpenAI API error', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);

                return response()->json([
                    'answer' => 'AI đang bận, bạn thử lại sau nhé.'
                ]);
            }

            /* ======================
               PARSE RESPONSE ĐÚNG
            ====================== */

            $json = $response->json();

            $answer = data_get(
                $json,
                'output.0.content.0.text',
                'Mình chưa tìm được thông tin phù hợp.'
            );

            return response()->json([
                'answer' => trim($answer)
            ]);

        } catch (\Throwable $e) {
            Log::error('Chat system error', [
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ]);

            return response()->json([
                'answer' => 'Lỗi hệ thống.'
            ], 500);
        }
    }
}
