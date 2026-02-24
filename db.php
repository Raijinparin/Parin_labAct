<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "assessment_db";
 
$conn = mysqli_connect($host, $user, $pass, $dbname);
 
if (!$conn) {
  die("Database connection failed: " . mysqli_connect_error());
}
?>
<style>
  html{
    font-family: 'Segoe UI', Arial, sans-serif;
    background: linear-gradient(135deg, #4e73df, #1cc88a);
    min-height: 100vh;
    margin: 0;
    overflow-x: hidden;
  }
  body{
    position: relative;
    min-height: 100vh;
    margin: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 24px;
    padding: 40px 20px;
  }

  body::after{
    content: "";
    position: absolute;
    width: 200px;
    height: 200px;
    bottom: -60px;
    right: -60px;
    border-radius: 50%;
    background: rgba(255,255,255,0.1);
    z-index: 0;
  }

  /* Navigation container centered and constrained */
  .nav-box{
    width: 100%;
    max-width: 1100px;
    margin: 0 auto;
    justify-content: center;
    background: rgba(255,255,255,0.06);
    padding: 12px 24px;
    border-radius: 12px;
  }

  .nav-box a{
    color: #ffffffcc;
    font-size: 14px;
    padding: 8px 14px;
  }

  h2{
    text-align: center;
    font-size: 32px;
    font-weight: 700;
    color: white;
    margin: 0;
    letter-spacing: 0.6px;
    position: relative;
    z-index: 2;
  }

  .dashboard-box{
    width: 420px;
    margin: 10px auto;
    background: rgba(255, 255, 255, 0.98);
    padding: 26px 28px;
    border-radius: 14px;
    box-shadow: 0 18px 40px rgba(0,0,0,0.18);
    backdrop-filter: blur(10px);
    position: relative;
    z-index: 2;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
  }

  .dashboard-box:hover{
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.25);
  }

  ul{
    list-style: none;
    padding: 0;
    margin: 0;
  }

  ul li{
    padding: 12px 0;
    font-size: 16px;
    color: #444;
    display: flex;
    justify-content: space-between;
    border-bottom: 1px solid #eee;
    transition: padding-left 0.3s ease;
  }

  ul li:hover{
    padding-left: 10px;
    color: #4e73df;
  }

  ul li:last-child{
    border-bottom: none;
  }

  p{
    text-align: center;
    font-size: 14px;
    color: #555;
    margin-top: 15px;
  }

  /* Responsive adjustments */
  @media (max-width: 900px){
    .dashboard-box{ width: 360px; }
    h2{ font-size: 28px; }
  }

  @media (max-width: 600px){
    body{ padding: 20px 12px; }
    .nav-box{ flex-wrap: wrap; gap: 8px; padding: 10px; }
    .nav-box a{ font-size: 13px; padding: 6px 10px; }
    h2{ font-size: 22px; }
    .dashboard-box{ width: 100%; max-width: 420px; padding: 18px; }
    ul li{ font-size: 15px; }
  }

  .nav-box{
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(10px);
    padding: 14px 0;
    display: flex;
    gap: 35px;
    align-items: center;
    justify-content: center;
    box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    position: relative;
    z-index: 1;
  }

  .nav-box a{
    color: white;
    text-decoration: none;
    font-size: 16px;
    font-weight: 500;
    padding: 6px 12px;
    border-radius: 8px;
    transition: all 0.3s ease;
  }

  .nav-box a:hover{
    background: rgba(255,255,255,0.2);
    transform: translateY(-2px);
  }

</style>