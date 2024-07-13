<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Dosen</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f0f4f8;
      color: #333;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }
    .header {
      background-color: #4a90e2;
      color: white;
      padding: 20px 0;
      text-align: center;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .header h1 {
      margin: 0;
      font-size: 28px;
      animation: fadeIn 1s ease-out;
    }
    .content {
      background-color: white;
      border-radius: 8px;
      padding: 30px;
      margin-top: 30px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      animation: slideUp 0.5s ease-out;
    }
    .form-group {
      margin-bottom: 20px;
    }
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: 600;
      color: #4a4a4a;
    }
    input[type="text"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 16px;
      transition: border-color 0.3s ease;
    }
    input[type="text"]:focus {
      border-color: #4a90e2;
      outline: none;
    }
    .btn {
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
      transition: all 0.3s ease;
    }
    .btn-primary {
      background-color: #4a90e2;
      color: white;
    }
    .btn-primary:hover {
      background-color: #3a7bc8;
    }
    .btn-danger {
      background-color: #e74c3c;
      color: white;
    }
    .btn-danger:hover {
      background-color: #c0392b;
    }
    .alert {
      padding: 15px;
      margin-bottom: 20px;
      border-radius: 4px;
      animation: fadeIn 0.5s ease-out;
    }
    .alert-success {
      background-color: #d4edda;
      color: #155724;
      border: 1px solid #c3e6cb;
    }
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
    @keyframes slideUp {
      from { transform: translateY(20px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }
  </style>
</head>
<body>
  <div class="header">
    <h1><i class="fas fa-university"></i> Universitas Kita</h1>
  </div>
  
  <div class="container">
    <div class="content">
      <h2><i class="fas fa-user-plus"></i> Tambah Dosen</h2>

      <?php if(!empty(session()->getFlashdata('message'))) : ?>
      <div class="alert alert-success">
        <?php echo session()->getFlashdata('message'); ?>
      </div>
      <?php endif ?>

      <form action="/tambah-data-dosen" method="post">
        <div class="form-group">
          <label for="nama">Nama Dosen:</label>
          <input type="text" name="nama" id="nama" required>
        </div>
        <div class="form-group">
          <label for="matakuliah">Mata Kuliah:</label>
          <input type="text" name="matakuliah" id="matakuliah" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="text" name="email" id="email" required>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Dosen</button>
        <a href="/dosen" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
      </form>
    </div>
  </div>
</body>
</html>