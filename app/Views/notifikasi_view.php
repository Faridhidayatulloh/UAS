<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        :root {
            --bg-color: #f0f2f5;
            --text-color: #333;
            --primary-color: #4e73df;
            --secondary-color: #1cc88a;
            --accent-color: #e74a3b;
            --card-bg: #ffffff;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg-color);
            color: var(--text-color);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            animation: gradientBG 15s ease infinite;
            background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
            background-size: 400% 400%;
        }
        
        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .container {
            max-width: 500px;
            width: 100%;
            padding: 20px;
        }
        
        .card {
            background-color: var(--card-bg);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
            animation: slideInDown 0.5s ease-out, float 6s ease-in-out infinite;
        }
        
        @keyframes slideInDown {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        
        .card-header {
            background-color: var(--primary-color);
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        
        .card-header h3 {
            margin: 0;
            font-size: 28px;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .card-body {
            padding: 30px;
        }
        
        .alert {
            background-color: var(--secondary-color);
            color: #fff;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
            animation: fadeInUp 0.5s ease-out;
        }
        
        @keyframes fadeInUp {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        .alert-heading {
            margin-top: 0;
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: var(--primary-color);
            color: #fff;
            text-decoration: none;
            border-radius: 30px;
            transition: all 0.3s;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            width: 100%;
            animation: fadeIn 1s ease-out;
        }
        
        .btn:hover {
            background-color: #3a5fc8;
            transform: translateY(-3px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.2);
        }
        
        .fas {
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3><i class="fas fa-bell"></i> Notifikasi</h3>
            </div>
            <div class="card-body">
                <div class="alert">
                    <h4 class="alert-heading">Notifikasi Terkirim!</h4>
                    <p><?= $message; ?></p>
                </div>
                <a href="/dosen" class="btn"><i class="fas fa-arrow-left"></i> Kembali ke Data Dosen</a>
            </div>
        </div>
    </div>
</body>
</html>