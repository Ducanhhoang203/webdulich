<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chatbot du lịch</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        .chat-box {
            width: 350px;
            height: 500px;
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 25px rgba(0,0,0,.2);
            display: flex;
            flex-direction: column;
        }

        .chat-header {
            background: #0d6efd;
            color: white;
            padding: 12px;
            border-radius: 10px 10px 0 0;
            font-weight: bold;
            text-align: center;
        }

        .chat-body {
            flex: 1;
            padding: 10px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        .msg {
            margin-bottom: 10px;
            padding: 8px 10px;
            border-radius: 6px;
            max-width: 80%;
            font-size: 14px;
            line-height: 1.4;
        }

        .user {
            background: #e9f5ff;
            align-self: flex-end;
        }

        .bot {
            background: #f1f1f1;
            align-self: flex-start;
        }

        .chat-input {
            display: flex;
            border-top: 1px solid #ddd;
        }

        .chat-input input {
            flex: 1;
            border: none;
            padding: 10px;
            outline: none;
        }

        .chat-input button {
            border: none;
            padding: 10px 15px;
            background: #0d6efd;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="chat-box">
    <div class="chat-header">🤖 Chatbot Du Lịch</div>

    <div class="chat-body" id="chatBody">
        <div class="msg bot">Xin chào 👋 Tôi có thể giúp gì cho bạn?</div>
    </div>

    <div class="chat-input">
        <input type="text" id="question" placeholder="Nhập câu hỏi...">
        <button onclick="send()">Gửi</button>
    </div>
</div>

<script>
async function send() {
    const input = document.getElementById('question');
    const text = input.value.trim();
    if (!text) return;

    addMessage(text, 'user');
    input.value = '';

    try {
        const res = await fetch('/api/chat/ask', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ question: text })
        });

        const raw = await res.text();
        console.log('SERVER RAW RESPONSE:', raw);

        let data;
        try {
            data = JSON.parse(raw);
        } catch (e) {
            addMessage('⚠️ Server lỗi (không trả JSON)', 'bot');
            return;
        }

        addMessage(data.answer ?? 'Không có phản hồi', 'bot');

    } catch (err) {
        console.error(err);
        addMessage('❌ Không kết nối được server', 'bot');
    }
}

function addMessage(text, type) {
    const div = document.createElement('div');
    div.className = 'msg ' + type;
    div.innerText = text;

    const chatBody = document.getElementById('chatBody');
    chatBody.appendChild(div);
    chatBody.scrollTop = chatBody.scrollHeight;
}
</script>


</body>
</html>
