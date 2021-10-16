<?php
    $id=$_GET['id'];
    $conn = mysqli_connect("localhost", "root", "","php_dev");
    if ($conn){
    mysqli_query($conn,"SET NAMES 'utf8' ");
    
    }else{
    echo "Bạn kết nối thất bại".mysqli_connect_error();
    }
    $sql    = "SELECT *FROM sanpham where id ='$id'";
    $result = $conn->query($sql);
?>
<?php
    
    $conn = mysqli_connect("localhost","root","","php_dev");
    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $query=mysqli_query($conn,"select * from `sanpham` ");
    $arr=array();
    while ($row=mysqli_fetch_assoc($query)) {
        $arr[]=$row;
    }
    $count= count($arr);
    $page = ceil($count/3);
    
    

?>
<!DOCTYPE html>
<html>
<body>
    <h1>detail</h1>
    <table>
        <tr>
            <th>thumb</th>
            <th>desctiption</th>
        </tr>
        <td>
        </td>
        <?php foreach($result as $rows): ?>
        <tr>
            <td>
                <img style="width: 100px;" src="static/<?php echo $rows['image']; ?>">
            </td>
            <td><?php echo $rows['description']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>