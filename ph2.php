<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname =  "myDB";
// 创建连接

$conn = new mysqli($servername, $username, $password,$dbname);

// 检测连接

if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

echo "连接成功";

$sql = "CREATE TABLE MyGuests (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
userId VARCHAR(30) NOT NULL,
userName VARCHAR(30) NOT NULL,
passWord VARCHAR(30) NOT NULL ,
userAddress  VARCHAR(50) NOT NULL ,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "创建数据表错误: " . $conn->error;
}

////向数据库插入表单传来的值
$userId=$_POST['userId']; //post获取表单里的userId
$userName=$_POST['userName']; //post获取表单里的userName
$passWord=$_POST['passWord']; //post获取表单里的passWord
$userAddress=$_POST['userAddress']; //post获取表单里的userAddress

$sql="insert into  MyGuests(userId, userName, passWord, userAddress) values ('$userId', '$userName', '$passWord' ,'$userAddress')";

if($conn->query($sql) === true){
    echo '插入成功';

}
else {
    echo 'data insert fail';
}


$conn->close();
?>