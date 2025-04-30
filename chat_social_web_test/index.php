
    <?php
    session_start();
    include('config/database.php');
    include('core/functions.php');
    include('core/validation.php');

    include('views/layouts/header.php');
    include("views/layouts/sidebar.php");

    // check if user is already exist in database or not
    // when delete this will work
    // if(email_check_Database($_SESSION['userId'])){

    // }else{
    //     header('location:?query=logout');
    //     exit;
    // }
    if(isset($_SESSION['message'])){
        showMessages();
    }

    if(isset($_GET["query"])){
        switch($_GET["query"]){
            case "chat": include("views/chat.php");
            break;
            case "browse": include("views/browse.php");
            break;
            case "create_post": include("views/browse/create_post.php");
            break;
            case "user_info": include("views/user_info.php");
            break;
            case "login": include("views/auth/login.php");
            break;
            case "register": include("views/auth/register.php");
            break;
            case "logout": include("views/auth/logout.php");
            break;
            case "setting": include("views/setting.php");
            break;
            case "registerController": include("controller/auth/registerController.php");
            break;
            case "loginController": include("controller/auth/loginController.php");
            break;
            case "addPost": include("controller/browse/addPost.php");
            break;
            case "deletePost": include("controller/browse/deletePost.php");
            break;
            case "addComment": include("controller/browse/addcomment.php");
            break;
            case "deleteComment": include("controller/browse/deletecomment.php");
            break;
            case "like": include("controller/browse/like.php");
            break;
            case "dislike": include("controller/browse/dislike.php");
            break;
            case "comment_like": include("controller/browse/comment_like.php");
            break;
            case "comment_dislike": include("controller/browse/comment_dislike.php");
            break;
            default: include("views/not_found.php");
        }
    }
    include('views/layouts/footer.php');
    ?>
