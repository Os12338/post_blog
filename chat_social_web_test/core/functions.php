<?php
// set messge for error or success
function setMessage($type,$message){
    $_SESSION['message']=
    [
        'type'=> $type,
        'text'=>$message
    ];
}

// show the target message
function showMessages()
{
    if (isset($_SESSION['message'])) {

        $type = $_SESSION['message']['type'];
        $text = $_SESSION['message']['text'];

        echo "<div class='text-center' style='z-index:1;position:absolute;width:calc(100% - 180px);margin-left:170px;'><div class='alert alert-$type'>$text</div></div>";

        unset($_SESSION['message']);
    }
}
// --------------------------------------------------------------------

// check the strength of the password
function password_strength($password){

    if(strlen($password) > 3){
    }else{
        setMessage('danger','password must contain at least 3 charcter');
        return false;
    }

    if(preg_match('/[a-z]/',$password)){
    }else{
        setMessage('danger','password have to contain small letters');
        return false;
    }

    if(preg_match('/[A-Z]/',$password)){
    }else{
        setMessage('danger','password have to contain capital letters');
        return false;
    }

    if(preg_match('/[1-9]/',$password)){
    }else{
        setMessage('danger','password have to contain numbers');
        return false;
    }

    return true;
}


// function store Register data in database
function register_data_Database($name,$email,$password,$imageName)
{
$conn = $GLOBALS['conn'];
$sql = "INSERT INTO users(`name`,`email`,`password`,`img`) VALUES ('$name','$email','$password','uploads/register/$imageName')";

$result = mysqli_query($conn,$sql);

if($result){
    return true;
}else{
    return false;
}
}

// functuin check if the email not doublicated in database
function email_check_Database($email)
{
$conn = $GLOBALS['conn'];

$sql = "SELECT * FROM `users` WHERE `email` = '$email' ";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
    return true;
}else{
    return false;
}
}


// function check login data in database
function login_data_Database($email,$password)
{
$conn = $GLOBALS['conn'];

$sql = "SELECT * FROM `users` WHERE `email` = '$email' ";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){
    $user_data = mysqli_fetch_assoc($result);
    if(password_verify($password,$user_data['PASSWORD'])){
        return $user_data;
    }else{
        return false;
    }
}else{
    return false;
}
}


// register image validation and extract
function image_register($img){
    $imagePath = __DIR__ . "/../uploads/register/" . $img['name'];

    $file_tmp = $_FILES['image']['tmp_name'];

    if(isset($file_tmp)){
        $path_image = strtolower(pathinfo($imagePath,PATHINFO_EXTENSION));
        $path_available = ['jpg','png','jpeg','png'];

        if(in_array($path_image,$path_available)){

            if(move_uploaded_file($file_tmp,$imagePath)){
                setMessage('success','uploading image successully');
                return true;
            }

        }else{
            setMessage('danger','please image with ext: jpg,png,jpeg,png');
            header('location:index.php?query=register');
            exit();
        }

    }else{
        return false;
    }
    }

// login image validation and extract
function image_post($img){
    $imagePath = __DIR__ . "/../uploads/posts/" . $img['name'];

    $file_tmp = $_FILES['image']['tmp_name'];

    if(isset($file_tmp)){
        $path_image = strtolower(pathinfo($imagePath,PATHINFO_EXTENSION));
        $path_available = ['jpg','png','jpeg','png'];

        if(in_array($path_image,$path_available)){

            if(move_uploaded_file($file_tmp,$imagePath)){
                setMessage('success','uploading image successully');
                return true;
            }

        }else{
            setMessage('danger','please image with ext: jpg,png,jpeg,png');
            header('location:index.php?query=create_post');
            exit();
        }

    }else{
        return false;
    }
    }

    // add posts in database
    function posts_data_Database($description,$imageName,$user_id)
{
$conn = $GLOBALS['conn'];
$sql = "INSERT INTO posts(`description`,`post_img`,`user_id`,`post_at`)
        VALUES ('$description','uploads/posts/$imageName','$user_id',NOW())";

$result = mysqli_query($conn,$sql);

if($result){
    return true;
}else{
    return false;
}
}


// to get the posts 
function getPosts(){
    $conn = $GLOBALS['conn'];
    $sql = 'SELECT * FROM `users_posts` ORDER BY post_at DESC';
    $res = mysqli_query($conn,$sql);

    if(mysqli_num_rows($res) > 0){
        return mysqli_fetch_all($res);
    }else{
        setMessage('danger','No posts to show');
        header('location:index.php');
        exit;
    }
}

// delete the post likes
function delete_likes_post($postId)
{
$conn = $GLOBALS['conn'];
// post id
$sql = "DELETE  FROM `posts_likes`  WHERE post_id = '$postId'";

$result = mysqli_query($conn,$sql);

}

// delete the post dislikes
function delete_dislikes_post($postId)
{
$conn = $GLOBALS['conn'];
// post id
$sql = "DELETE  FROM `posts_dislikes`  WHERE post_id = '$postId'";

$result = mysqli_query($conn,$sql);

}

// delete comment when delete post
function deleteComment_post($postId)
{
$conn = $GLOBALS['conn'];
// post id
$sql = "DELETE  FROM `comments` WHERE post_id = '$postId'";

$result = mysqli_query($conn,$sql);

if($result){
    return true;
}else{
    return false;
}
}
// delete the post
function deletePost($postId,$postImg)
{
$conn = $GLOBALS['conn'];
// delete the post from db and sequencly delete its comments

$sql = "DELETE  FROM `posts` WHERE id = '$postId';";
unlink("$postImg");
// delete the comments on the post
deleteComment_post($postId);
// delete likes and dislikes
delete_likes_post($postId);
delete_dislikes_post($postId);

$result = mysqli_query($conn,$sql);

if($result){
    return true;
}else{
    return false;
}
}


    // add comment in database
    function addComment($content,$postId,$userId)
{
$conn = $GLOBALS['conn'];
$sql = "INSERT INTO comments(`content`,`user_id`,`post_id`,`comment_at`)
        VALUES ('$content','$userId','$postId',NOW())";

$result = mysqli_query($conn,$sql);

if($result){
    return true;
}else{
    return false;
}
}

// to get the comments 
function getComments(){
    $conn = $GLOBALS['conn'];
    $sql = 'SELECT * FROM `users_comments` ORDER BY comment_at DESC';
    $res = mysqli_query($conn,$sql);

    if(mysqli_num_rows($res) > 0){
        return mysqli_fetch_all($res);
    }else{
        return false;
    }
}

// delete the dislikes if the commentt is deleted

function delete_likes_comment($commentId)
{
$conn = $GLOBALS['conn'];
// post id
$sql = "DELETE  FROM `comments_likes`  WHERE post_id = '$commentId'";

$result = mysqli_query($conn,$sql);

}

// delete the dislikes if the commentt is deleted
function delete_dislikes_comment($commentId)
{
$conn = $GLOBALS['conn'];
// post id
$sql = "DELETE  FROM `comments_dislikes`  WHERE comment_id = '$commentId'";

$result = mysqli_query($conn,$sql);

}

// delete the comment if the post is deleted
function deleteComment($commentId)
{
$conn = $GLOBALS['conn'];
// post id
$sql = "DELETE  FROM `comments` WHERE id = '$commentId'";
delete_likes_comment($commentId);
delete_dislikes_comment($commentId);

$result = mysqli_query($conn,$sql);

if($result){
    return true;
}else{
    return false;
}
}

    // add likes in database
    function post_likes($postId,$userId)
{
$conn = $GLOBALS['conn'];
// when the user change his opinion and make like instead of dislike vice versa
$sql_get = "SELECT user_id,post_id FROM `posts_dislikes` WHERE user_id = $userId AND post_id = $postId";
$result_get = mysqli_query($conn,$sql_get);

if(mysqli_num_rows($result_get) > 0){

    $sql_get = "DELETE FROM `posts_dislikes` WHERE user_id = $userId AND post_id = $postId";
    $result_get = mysqli_query($conn,$sql_get);
    // check if the user already do like on the post or not
    $sql_get = "SELECT user_id,post_id FROM `p_likes` WHERE user_id = $userId AND post_id = $postId";
    $result_get = mysqli_query($conn,$sql_get);
    if(mysqli_num_rows($result_get) > 0){
        return false;
    }else{
        // add like in database
        $sql = "INSERT INTO posts_likes(`user_id`,`post_id`)
                VALUES ('$userId','$postId')";
        
        $result = mysqli_query($conn,$sql);
        
        if($result){
            return true;
        }else{
            return false;
        }
}
}else{
    // check if the user already do like on the post or not
    $sql_get = "SELECT user_id,post_id FROM `p_likes` WHERE user_id = $userId AND post_id = $postId";
    $result_get = mysqli_query($conn,$sql_get);
    if(mysqli_num_rows($result_get) > 0){
        return false;
    }else{
        // add like in database
        $sql = "INSERT INTO posts_likes(`user_id`,`post_id`)
                VALUES ('$userId','$postId')";
        
        $result = mysqli_query($conn,$sql);
        
        if($result){
            return true;
        }else{
            return false;
        }
}
}
}

    // add dislikes in database
    function post_dislikes($postId,$userId)
{
$conn = $GLOBALS['conn'];
// when the user change his opinion and make like instead of dislike vice versa
$sql_get = "SELECT user_id,post_id FROM `posts_likes` WHERE user_id = $userId AND post_id = $postId";
$result_get = mysqli_query($conn,$sql_get);
if(mysqli_num_rows($result_get) > 0){
    $sql_get = "DELETE FROM `posts_likes` WHERE user_id = $userId AND post_id = $postId";
    $result_get = mysqli_query($conn,$sql_get);
    // check if the user already do dislike on the post or not
$sql_get = "SELECT user_id,post_id FROM `p_dislikes` WHERE user_id = $userId AND post_id = $postId";
$result_get = mysqli_query($conn,$sql_get);
if(mysqli_num_rows($result_get) > 0){
    return false;
}else{
$sql = "INSERT INTO posts_dislikes(`user_id`,`post_id`)
        VALUES ('$userId','$postId')";

$result = mysqli_query($conn,$sql);

if($result){
    return true;
}else{
    return false;
}
}
}else{
    // check if the user already do dislike on the post or not
    $sql_get = "SELECT user_id,post_id FROM `p_dislikes` WHERE user_id = $userId AND post_id = $postId";
    $result_get = mysqli_query($conn,$sql_get);
    if(mysqli_num_rows($result_get) > 0){
        return false;
    }else{
    $sql = "INSERT INTO posts_dislikes(`user_id`,`post_id`)
            VALUES ('$userId','$postId')";
    
    $result = mysqli_query($conn,$sql);
    
    if($result){
        return true;
    }else{
        return false;
    }
    }
}
}

    // add likes on comments in database
    function likes_comments($postId,$userId)
{
$conn = $GLOBALS['conn'];
// when the user change his opinion and make like instead of dislike vice versa
$sql_get = "SELECT user_id,comment_id FROM `comments_dislikes` WHERE user_id = $userId AND comment_id = $postId";
$result_get = mysqli_query($conn,$sql_get);

if(mysqli_num_rows($result_get) > 0){

    $sql_get = "DELETE FROM `comments_dislikes` WHERE user_id = $userId AND comment_id = $postId";
    $result_get = mysqli_query($conn,$sql_get);
    // check if the user already do like on the post or not
$sql_get = "SELECT user_id,post_id FROM `c_total_likes` WHERE user_id = $userId AND post_id = $postId";
$result_get = mysqli_query($conn,$sql_get);

if(mysqli_num_rows($result_get) > 0){
    return false;
}else{
    $sql = "INSERT INTO comments_likes(`user_id`,`post_id`)
            VALUES ('$userId','$postId') ";
    
    $result = mysqli_query($conn,$sql);
    
    if($result){
        return true;
    }else{
        return false;
    }
}
}else{
        // check if the user already do like on the post or not
$sql_get = "SELECT user_id,post_id FROM `c_total_likes` WHERE user_id = $userId AND post_id = $postId";
$result_get = mysqli_query($conn,$sql_get);

if(mysqli_num_rows($result_get) > 0){
    return false;
}else{
    $sql = "INSERT INTO comments_likes(`user_id`,`post_id`)
            VALUES ('$userId','$postId') ";
    
    $result = mysqli_query($conn,$sql);
    
    if($result){
        return true;
    }else{
        return false;
    }
}
}
}

    // add dislikes on comments in database
    function dislikes_comments($commentId,$userId)
{

$conn = $GLOBALS['conn'];
// when the user change his opinion and make like instead of dislike vice versa
$sql_get = "SELECT user_id,post_id FROM `comments_likes` WHERE user_id = $userId AND post_id = $commentId";
$result_get = mysqli_query($conn,$sql_get);

if(mysqli_num_rows($result_get) > 0){

    $sql_get = "DELETE FROM `comments_likes` WHERE user_id = $userId AND post_id = $commentId";
    $result_get = mysqli_query($conn,$sql_get);
    // check if the user already do like on the post or not

$sql_get = "SELECT user_id,comment_id FROM `c_total_dislikes` WHERE user_id = $userId AND comment_id = $commentId";
$result_get = mysqli_query($conn,$sql_get);

if(mysqli_num_rows($result_get) > 0){
    return false;
}else{
$sql = "INSERT INTO comments_dislikes(`comment_id`,`user_id`)
        VALUES ('$commentId','$userId')";

$result = mysqli_query($conn,$sql);

if($result){
    return true;
}else{
    return false;
}
}
}else{
    // check if the user already do like on the post or not

    $sql_get = "SELECT user_id,comment_id FROM `c_total_dislikes` WHERE user_id = $userId AND comment_id = $commentId";
    $result_get = mysqli_query($conn,$sql_get);
    
    if(mysqli_num_rows($result_get) > 0){
        return false;
    }else{
    $sql = "INSERT INTO comments_dislikes(`comment_id`,`user_id`)
            VALUES ('$commentId','$userId')";
    
    $result = mysqli_query($conn,$sql);
    
    if($result){
        return true;
    }else{
        return false;
    }
    }
}
}


// =====================get
// to get the post likes 
function get_likes_post(){
    $conn = $GLOBALS['conn'];
    $sql = "SELECT like_num ,user_id,post_id FROM `p_likes` ";
    $res = mysqli_query($conn,$sql);

    if(mysqli_num_rows($res) > 0){
        return mysqli_fetch_all($res);
    }else{
        return false;
    }
}

// to get the post dislikes 
function get_dislikes_post(){
    $conn = $GLOBALS['conn'];
    $sql = 'SELECT dislike_num, user_id,post_id FROM `p_dislikes`';
    $res = mysqli_query($conn,$sql);

    if(mysqli_num_rows($res) > 0){
        return mysqli_fetch_all($res);
    }else{
        return false;
    }
}

// to get the comment likes 
function get_likes_comment(){
    $conn = $GLOBALS['conn'];
    $sql = "SELECT like_num ,user_id,post_id FROM `c_total_likes` ";
    $res = mysqli_query($conn,$sql);

    if(mysqli_num_rows($res) > 0){
        return mysqli_fetch_all($res);
    }else{
        return false;
    }
}

// to get the comment dislikes 
function get_dislikes_comment(){
    $conn = $GLOBALS['conn'];
    $sql = 'SELECT dislike_num, user_id, comment_id FROM `c_total_dislikes`';
    $res = mysqli_query($conn,$sql);

    if(mysqli_num_rows($res) > 0){
        return mysqli_fetch_all($res);
    }else{
        return false;
    }
}

