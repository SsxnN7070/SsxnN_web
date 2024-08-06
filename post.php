<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>
<body>
    <h1 style="text-align: center;">Webbord KakKak</h1>
    <hr>
    <div style="text-align: center;">
        ต้องการดูกระทู้หมายเลข <?php echo " $_GET[id]<br>";
        
        $id = $_GET['id'];
            if(($id%2) == 0){
                    echo "เป็นกระทู้หมายเลขคู่";
            }else{
                    echo "เป็นกระทู้หมายเลขคี่";
            }

        ?>
    </div>
    <br>
    <center>
        <table style="border: 2px solid black; width: 40%;" align="center">
            <tr>
                <td style=" background-color: aqua; text-align: center;" >แสดงความคิดเห็น</td>
            </tr>
            <td><form>
                <center><textarea style="border: 1px solid black;width: 96%;"name="new" id="jjj" cols="30" rows="4"></textarea></center>
            </form></td>
            <tr><td>
            <center><input type="submit" value="ส่งข้อความ"></td></center>
            </td></tr>
        </table>
        <br>
        <a href="index.php">กลับไปหน้าหลัก</a>
        </form>
</body>
</html>