<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Dosen - Universitas Kita</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    :root {
      --bg-color: #f0f8ff;
      --text-color: #333;
      --primary-color: #4a90e2;
      --secondary-color: #2ecc71;
      --accent-color: #e74c3c;
      --card-bg: #ffffff;
    }
    
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: var(--bg-color);
      color: var(--text-color);
      margin: 0;
      padding: 0;
      animation: fadeIn 0.5s ease-out;
    }
    
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
    
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }
    
    header {
      background-color: var(--primary-color);
      padding: 20px 0;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .logo {
      font-size: 28px;
      font-weight: bold;
      color: #fff;
      text-align: center;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
    }
    
    main {
      padding: 40px 0;
    }
    
    h1 {
      margin-bottom: 30px;
      color: var(--primary-color);
      text-align: center;
      font-size: 36px;
      animation: slideInTop 0.5s ease-out;
    }
    
    @keyframes slideInTop {
      from { transform: translateY(-30px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }
    
    .dashboard {
      display: flex;
      justify-content: center;
      margin-bottom: 30px;
    }
    
    .dashboard-card {
      background-color: var(--card-bg);
      border-radius: 15px;
      padding: 20px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      transition: all 0.3s;
      animation: fadeInUp 0.5s ease-out;
      width: 200px;
      text-align: center;
    }
    
    .dashboard-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 6px 20px rgba(0,0,0,0.15);
    }
    
    .dashboard-card h2 {
      font-size: 20px;
      margin-bottom: 10px;
      color: var(--primary-color);
    }
    
    .dashboard-card p {
      font-size: 36px;
      font-weight: bold;
      color: var(--secondary-color);
    }
    
    .btn {
      display: inline-block;
      padding: 12px 24px;
      background-color: var(--primary-color);
      color: #fff;
      text-decoration: none;
      border-radius: 30px;
      transition: all 0.3s;
      font-weight: bold;
      margin-bottom: 20px;
    }
    
    .btn:hover {
      background-color: #3a7bd5;
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }
    
    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0 10px;
      margin-top: 20px;
    }
    
    th, td {
      padding: 15px;
      text-align: left;
    }
    
    th {
      background-color: var(--primary-color);
      color: #fff;
      font-weight: bold;
      text-transform: uppercase;
      letter-spacing: 1px;
      border-radius: 10px 10px 0 0;
    }
    
    tr {
      background-color: var(--card-bg);
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      border-radius: 10px;
      transition: all 0.3s;
    }
    
    tr:hover {
      transform: translateY(-3px);
      box-shadow: 0 4px 15px rgba(0,0,0,0.15);
    }
    
    .action-buttons {
      display: flex;
      gap: 10px;
    }
    
    .action-btn {
      padding: 8px 16px;
      border-radius: 20px;
      text-decoration: none;
      color: #fff;
      transition: all 0.3s;
      font-size: 14px;
      font-weight: bold;
    }
    
    .btn-warning {
      background-color: var(--secondary-color);
    }
    
    .btn-danger {
      background-color: var(--accent-color);
    }
    
    .action-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 2px 4px rgba(0,0,0,0.2);
    }
    
    .alert {
      background-color: #d4edda;
      color: #155724;
      padding: 15px;
      border-radius: 10px;
      margin-bottom: 20px;
      animation: fadeIn 0.5s ease-out;
    }
  </style>
</head>
<body>
  <header>
    <div class="container">
      <div class="logo">Universitas Kita</div>
    </div>
  </header>
  <main>
    <div class="container">
      <h1>Dashboard Data Dosen</h1>
      
      <div class="dashboard">
        <div class="dashboard-card">
          <h2>Total Dosen</h2>
          <p><?php echo count($DataDosen); ?></p>
        </div>
      </div>
      
      <?php if(!empty(session()->getFlashdata('message'))) : ?>
      <div class="alert">
        <?php echo session()->getFlashdata('message'); ?>
      </div>
      <?php endif ?>
      
      <div style="text-align: center;">
        <a href="/tambah-data-dosen" class="btn"><i class="fas fa-plus"></i> TAMBAH DATA</a>
      </div>
      
      <table>
        <thead>
          <tr>
            <th>Nama</th>
            <th>Mata Kuliah</th>
            <th>Email</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($DataDosen as $key => $dosen) : ?>
          <tr>
            <td><?php echo $dosen['nama'] ?></td>
            <td><?php echo $dosen['matakuliah'] ?></td>
            <td><?php echo $dosen['email'] ?></td>
            <td>
              <div class="action-buttons">
                <a href="notifikasi/dosen-masuk/<?= $dosen['id_dosen'];?>" class="action-btn btn-warning"><i class="fas fa-check"></i> Masuk</a>
                <a href="notifikasi/dosen-tidak-masuk/<?= $dosen['id_dosen'];?>" class="action-btn btn-danger"><i class="fas fa-times"></i> Tidak</a>
              </div>
            </td>
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </main>
</body>
</html>