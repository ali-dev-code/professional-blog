<?php

//************* Some helper function  *********/

// for redirecting page
function Redirect_to($location)
{
    header("Location:{$location}");
    exit;
}
// Display Messages through sessions
function errorMsg()
{
    if (isset($_SESSION['error'])) {
        $Output = "<div class='alert alert-danger alert-dismissible fade show '>";
        $Output .= htmlentities($_SESSION['error']);
        $Output .= "<button type='button'class='close' data-dismiss='alert' aria-label='Close'>";
        $Output .= "<span aria-hidden='true'>&times;</span>";
        $Output .= '</div>';

        echo $Output;
        unset($_SESSION['error']);
    }
}
function successMsg()
{
    if (isset($_SESSION['success'])) {
        $Output = "<div class='alert alert-success alert-dismissible fade show '>";
        $Output .= htmlentities($_SESSION['success']);
        $Output .= "<button type='button'class='close' data-dismiss='alert' aria-label='Close'>";
        $Output .= "<span aria-hidden='true'>&times;</span>";
        $Output .= '</div>';

        echo $Output;
        unset($_SESSION['success']);
    }
}

// validation errors in form
// we can alao use delimitter so that we dont have to worry anout .= things :) means we can use html code as we want

function validation_errors($error_message)
{
    $error_message = <<<DELIMITER

<div class="alert alert-danger alert-dismissible " role="alert">
     <strong> WARNING:!</strong> $error_message
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
     </button>
</div>
DELIMITER;
    return $error_message;
}

// check if emqil is already existed
function email_Exist($email)
{
    $sql = " SELECT * FROM users WHERE email = '$email' ";
    $result = query($sql);
    confirm($result);
    if (row_count($result) > 0) {
        return true;
    } else {
        return false;
    }
}

function cat_Exist($cat_title)
{
    $sql = " SELECT * FROM categories WHERE cat_name = '$cat_title' ";
    $result = query($sql);
    confirm($result);
    if (row_count($result) > 0) {
        return true;
    } else {
        return false;
    }
}

//***************** SHow Post page ************************/

// add-comment

function add_comment()
{
    if (isset($_POST['add-com'])) {
        $post_id_from_url = $_GET['p_id'];
        $c_author = escape($_POST['c-author']);
        $c_email = escape($_POST['c-email']);
        $c_content = escape($_POST['c-content']);

        $errors = [];

        if (empty($c_author)) {
            $errors[] = ' please provide your name ';
        }
        if (empty($c_email)) {
            $errors[] = ' please provide your email ';
        }
        if (empty($c_content)) {
            $errors[] = ' please provide your comment ';
        }

        if (!empty($errors)) {
        foreach ($errors as$error) {
         echo validation_errors($error);
        }
        }else {
          $sql = " INSERT INTO comments (comment_post_id,comment_author,comment_email,comment_content,comment_status)  ";
          $sql .= " VALUES('$post_id_from_url','$c_author','$c_email', '$c_content', 1) ";
          $execute = query($sql);
          confirm($execute);

          // add increment every time when we comment on post. field comment count in post table

          $query = " UPDATE posts SET post_comment_count = post_comment_count + 1  WHERE post_id = '$post_id_from_url' ";
          $executeQuery = query($query);
          confirm($query);

          if ($execute) {
           $_SESSION['success'] = "Comment has been submited successfully";
           Redirect_to("show-post.php?p_id={$post_id_from_url}");
          }
        }
    }
}

// delete comment

// delete comment
function c_delete()
{
    if (isset($_GET['delete'])) {
        $c_delete_id = $_GET['delete'];

        $sql = " DELETE FROM comments WHERE c_id = '$c_delete_id' ";
        $execute = query($sql);
        confirm($execute);
        if ($execute) {
            $_SESSION['success'] = 'comment has been deleted successfully';
            Redirect_to('comments.php');
        }
    }
}

// unapprove comment
function c_un()
{
    if (isset($_GET['unapprove'])) {
        $c_id = $_GET['unapprove'];

        $sql = " UPDATE comments SET comment_status = 0  WHERE c_id = '$c_id' ";
        $execute = query($sql);
        confirm($execute);
        if ($execute) {
            $_SESSION['success'] = 'comment has been unapproved successfully';
            Redirect_to('comments.php');
        }
    }
}

// approve comment
function c_ap()
{
    if (isset($_GET['approve'])) {
        $c_id = $_GET['approve'];

        $sql = " UPDATE comments SET comment_status = 1  WHERE c_id = '$c_id' ";
        $execute = query($sql);
        confirm($execute);
        if ($execute) {
            $_SESSION['success'] = 'comment has been approved successfully';
            Redirect_to('comments.php');
        }
    }
}



//***************** Admin Panel ************************/

// set nav link to active when open

function active($currect_page)
{
    $url_array = explode('/', $_SERVER['REQUEST_URI']) ;
    $url = end($url_array);
    if ($currect_page == $url) {
        echo 'active'; //class name in css
    }
}

// add category into database

function add_cat()
{
    $errors = [];

    if (isset($_POST['add-cat'])) {
        $cat_title = escape($_POST['cat_title']);
        $cat_title = strtoupper($cat_title);
        if (empty($cat_title)) {
            $errors[] = 'Please Provide Categpry Title';
        }

        if (cat_Exist($cat_title)) {
            $errors[] = 'Category already existed';
        }
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo validation_errors($error);
            }
        } else {
            $sql = " INSERT INTO categories(cat_name) VALUES('$cat_title')  ";
            $execute = query($sql);
            confirm($execute);
            if ($execute) {
                $_SESSION['success'] = 'category has been added successfully';
                Redirect_to('categories.php');
            }
        }
    }
}

// delete category
function cat_delete()
{
    if (isset($_GET['delete'])) {
        $cate_delete_id = $_GET['delete'];

        $sql = " DELETE FROM categories WHERE cat_id = '$cate_delete_id' ";
        $execute = query($sql);
        confirm($execute);
        if ($execute) {
            $_SESSION['success'] = 'category has been deleted successfully';
            Redirect_to('categories.php');
        }
    }
}

// update category

function update_cat()
{
    if (isset($_POST['update-cat'])) {
        $cat_update_id = $_GET['edit'];
        $cat_title = escape($_POST['cat_name']);
        $sql = " SELECT * FROM categories WHERE cat_name = '$cat_title' AND cat_id != '$cat_update_id' ";
        $result = query($sql);
        confirm($result);
        $errors = [];

        if (empty($cat_title)) {
            $errors[] = 'Please provide category title';
        }

        if (row_count($result) > 0) {
            $errors[] = 'category title already existed';
        }

        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo validation_errors($error);
            }
        } else {
            $sql = " UPDATE categories SET cat_name = '$cat_title' WHERE cat_id = '$cat_update_id' ";
            $execute = query($sql);
            confirm($execute);
            if ($execute) {
                $_SESSION['success'] = 'category has been updated successfully';
                Redirect_to('categories.php');
            }
        }
    }
}

// check if all category has been deleted and admin want to add post. we will tell him add category first

////////********** Add Post *****/
$post_title = $post_author = $post_category = $post_content = $post_status = $post_tags = '';
function add_post()
{
    if (isset($_POST['add-post'])) {
        global $post_title , $post_author, $post_category, $post_content, $post_status, $post_tags;

        $post_title = escape($_POST['post_title']);
        $post_author = strtoupper(escape($_POST['post_author']));
        $post_category = escape($_POST['post_category']);
        $post_content = escape($_POST['post_content']);
        $post_status = escape($_POST['post_status']);

        $post_tags = strtoupper(escape($_POST['post_tags']));
        $post_date = date('d-m-y');


        // For image

        $image_name = $_FILES['post_image']['name']; // file name
        $image_tmp_name = $_FILES['post_image']['tmp_name']; // file temp name in srver
        $image_size = $_FILES['post_image']['size']; // file size

        $image_ext = explode('.', $image_name); // we get two parts here first name and second extention

        $image_actual_ext = strtolower(end($image_ext)); // yaha pr hm second part len gy array se end function se.. extenion.

        $allowed_files = ['jpg', 'jpeg', 'png', 'pdf'];

        $errors = [];

        if (empty($post_title) || empty($post_author) || empty($post_content) || empty($image_tmp_name) || empty($post_tags)) {
            $errors[] = 'all fields are required';
        }

        if (strlen($post_title) < 20) {
            $errors[] = 'title length is too short. minimum 20 characters';
        }

        if (strlen($post_content) < 100) {
            $errors[] = 'post content length is too short. minimum 100 characters';
        }

        if (!in_array($image_actual_ext, $allowed_files)) {
            $errors[] = 'Only jpg and png file can be upload';
        } elseif ($image_size > 500000) {
            $errors[] = 'Maximum file size is 500kb';
        } else {
            $image_new_name = uniqid('', true) . '.' . $image_actual_ext;
        }

        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo validation_errors($error);
            }
        } else {
            $sql = 'INSERT INTO posts(category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ';
            $sql .= "VALUES('$post_category' , '$post_title' , '$post_author' , now() , '$image_new_name' , '$post_content' , '$post_tags' , 0,  '$post_status' )";
            $executeSql = query($sql);
            confirm($executeSql);
            if ($executeSql) {
                move_uploaded_file($image_tmp_name, "../assets/img/thumb/$image_new_name");
                $_SESSION['success'] = 'Post Has been Added successfully';
                Redirect_to('posts.php');
            }
        }
    }
}

// delete post

function delete_post()
{
    if (isset($_GET['delete'])) {
        $post_delete_id = $_GET['delete'];

        $sql = " DELETE FROM posts WHERE post_id = '$post_delete_id' ";
        $execute = query($sql);
        confirm($execute);
        if ($execute) {
            $_SESSION['success'] = 'post has been deleted successfully';
            Redirect_to('posts.php');
        }
    }
}

// update post

function update_post()
{
    if (isset($_POST['update-post'])) {
        $post_id_from_url = $_GET['p_id'];

        $post_title = escape($_POST['post_title']);
        $post_author = escape($_POST['post_author']);
        $post_category = escape($_POST['post_category']);
        $post_content = escape($_POST['post_content']);
        $post_status = escape($_POST['post_status']);

        $post_tags = escape($_POST['post_tags']);
        $post_date = date('d-m-y');
        $post_comments_count = 4;

        // For image

        $image_name = $_FILES['post_image']['name']; // file name
    $image_tmp_name = $_FILES['post_image']['tmp_name']; // file temp name in srver
    $image_size = $_FILES['post_image']['size']; // file size

    $image_ext = explode('.', $image_name); // we get two parts here first name and second extention

        $image_actual_ext = strtolower(end($image_ext)); // yaha pr hm second part len gy array se end function se.. extenion.

        $allowed_files = ['jpg', 'jpeg', 'png', 'pdf'];

        $errors = [];

        if (empty($post_title) || empty($post_author) || empty($post_category) || empty($post_content) || empty($post_tags)) {
            $errors[] = 'All fields required';
        }

        if ($image_size > 500000) {
            $errors[] = 'Maximum file size is 500kb';
        } else {
            $image_new_name = uniqid('', true) . '.' . $image_actual_ext;
        }

        // if admin update post without changing the pic
        if (empty($image_name)) {
            $sql_img = " SELECT * FROM posts WHERE post_id = '$post_id_from_url' ";
            $execute_sql_img = query($sql_img);
            while ($row = fetch_array($execute_sql_img)) {
                $image_new_name = $row['post_image'];
            }
        } elseif (!empty($image_name)) { // if admin upload new img we have to delete previus image and upload new
            $deleteImage = " SELECT * FROM posts WHERE post_id = '$post_id_from_url' ";
            $execute = query($deleteImage);
            confirm($execute);
            $row = fetch_array($execute);
            $image = $row['post_image'];
            unlink("../assets/img/thumb/$image");
        }

        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo validation_errors($error);
            }
        } else {
            $query = " UPDATE posts SET category_id = '$post_category', post_title = '$post_title' ,  ";
            $query .= " post_date = now() , post_image = '$image_new_name', ";
            $query .= " post_content = '$post_content' , post_tags = '$post_tags', ";
            $query .= " post_date = now() , post_image = '$image_new_name', post_status = '$post_status' WHERE post_id = '$post_id_from_url' ";
            $execute = query($query);
            confirm($execute);

            if ($execute) {
                move_uploaded_file($image_tmp_name, "../assets/img/thumb/$image_new_name");
                $_SESSION['success'] = 'Post has been updated successfully';
                Redirect_to('posts.php');
            }
        }
    }
}


// add user

function add_user()
{
    if (isset($_POST['add-user'])) {


        $u_fname = escape($_POST['f_name']);
        $u_lname = escape($_POST['l_name']);
         $u_role = escape($_POST['u_role']);
         $u_name = escape($_POST['u_name']);
         $u_mail = escape($_POST['u_mail']);
         $u_pass = escape($_POST['u_pass']);


        $post_date = date('d-m-y');


        // For image
/**
        $image_name = $_FILES['post_image']['name']; // file name
        $image_tmp_name = $_FILES['post_image']['tmp_name']; // file temp name in srver
        $image_size = $_FILES['post_image']['size']; // file size

        $image_ext = explode('.', $image_name); // we get two parts here first name and second extention

        $image_actual_ext = strtolower(end($image_ext)); // yaha pr hm second part len gy array se end function se.. extenion.

        $allowed_files = ['jpg', 'jpeg', 'png', 'pdf'];
*/
        $errors = [];

        if (empty($u_fname) || empty($u_lname) || empty($u_role) || empty($u_name) || empty($u_mail) || empty($u_pass)) {
            $errors[] = 'all fields are required';
        }



        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo validation_errors($error);
            }
        } else {
            $sql = 'INSERT INTO users(u_username, u_password, u_fname, u_lname, u_email, u_role) ';
            $sql .= "VALUES('$u_name' , '$u_pass' , '$u_fname' , '$u_lname' , '$u_mail' , '$u_role' )";
            $executeSql = query($sql);
            confirm($executeSql);
            if ($executeSql) {

                $_SESSION['success'] = 'user has been Added successfully';
                Redirect_to('users.php');
            }
        }
    }
}
// user delete
function u_delete()
{
    if (isset($_GET['delete'])) {
        $user_delete_id = $_GET['delete'];

        $sql = " DELETE FROM users WHERE u_id = '$user_delete_id' ";
        $execute = query($sql);
        confirm($execute);
        if ($execute) {
            $_SESSION['success'] = 'User has been deleted successfully';
            Redirect_to('users.php');
        }
    }
}

// change~ user roles

function u_role_admin()
{
    if (isset($_GET['change_to_admin'])) {
        $user_id = $_GET['change_to_admin'];

        $sql = " UPDATE users SET u_role = 'admin' WHERE u_id = '$user_id' ";
        $execute = query($sql);
        confirm($execute);
        if ($execute) {
            $_SESSION['success'] = 'User role has been updated to Admin successfully';
            Redirect_to('users.php');
        }
    }
}

function u_role_sub()
{
    if (isset($_GET['change_to_sub'])) {
        $user_id = $_GET['change_to_sub'];

        $sql = " UPDATE users SET u_role = 'subscriber' WHERE u_id = '$user_id' ";
        $execute = query($sql);
        confirm($execute);
        if ($execute) {
            $_SESSION['success'] = 'User role has been updated to Subscriber successfully';
            Redirect_to('users.php');
        }
    }
}

// update user
function update_user() {
  if (isset($_POST['up-user'])) {
     $user_id = $_GET['edit'];
     $u_fname = escape($_POST['f_name']);
     $u_lname = escape($_POST['l_name']);
     $u_role = escape($_POST['u_role']);
     $u_name = escape($_POST['u_name']);
     $u_mail = escape($_POST['u_mail']);
     $u_pass = escape($_POST['u_pass']);
     $errors = [];

     if (empty($u_fname) || empty($u_lname) || empty($u_role) || empty($u_name) || empty($u_mail) || empty($u_pass)) {
         $errors[] = 'all fields are required';
     }
     if (!empty($errors)) {
      foreach ($errors as $error) {
          echo validation_errors($error);
      }
  } else {

      $sql = " UPDATE users SET u_username = '$u_name' , u_password = '$u_pass' , u_fname = '$u_fname', u_lname ='$u_lname', u_email='$u_mail', u_role='$u_role'  ";
      $sql .= " WHERE u_id = $user_id ";
      $executeSql = query($sql);
      confirm($executeSql);
      if ($executeSql) {

          $_SESSION['success'] = 'user has been updated successfully';
          Redirect_to('users.php');
      }
  }


  }


  }


  // login admin and user
 $login_errors = [];

 function user_login() {
  global $login_errors;

    if (isset($_POST["login"])) {

     $userName = escape($_POST['username']);
     $userPassword = escape($_POST['password']);

      $sql = " SELECT * FROM users WHERE u_username = '$userName'  ";

      $result = query($sql);

       if ($row = fetch_array($result)) {

          $db_u_username = $row['u_username'];
          $db_u_password = $row['u_password'];
          $db_u_fname = $row['u_fname'];
          $db_u_lname = $row['u_lname'];
          $db_u_role = $row['u_role'];
         // end of while loop
          if ($userPassword === $db_u_password) {
            $_SESSION['username'] =  $db_u_username;
            $_SESSION['ufname'] =  $db_u_fname;
            $_SESSION['ulname'] =  $db_u_lname;
            $_SESSION['urole'] =  $db_u_role;

            Redirect_to("panel");

           } else  {

            $login_errors['p'] = "Invalid Password";

           }

       } else {
           $login_errors['u'] = 'Invalid Username';




       } // end of else







    } // end of if isset(login)

  } // end of user login function


 // if login

 function login(){
   if (isset($_SESSION['username'])) {
   return true;
   }
 }

// restirction login

function confirm_login(){
  if (!login()) {
  Redirect_to("../login.php");
  }
}

// confrim login_admin
function confirm_admin() {

if (isset($_SESSION['urole'])) {
if ($_SESSION['urole']  !== 'admin') {
$_SESSION['error'] = "you are not admin dear xD";
Redirect_to('../index.php');
}
}

}

// update user
function update_profile() {
  if (isset($_POST['up-profile'])) {
     $userName = $_SESSION['username'];
     $u_fname = escape($_POST['f_name']);
     $u_lname = escape($_POST['l_name']);
     $u_role = escape($_POST['u_role']);
     $u_name = escape($_POST['u_name']);
     $u_mail = escape($_POST['u_mail']);
     $u_pass = escape($_POST['u_pass']);
     $errors = [];

     if (empty($u_fname) || empty($u_lname) || empty($u_role) || empty($u_name) || empty($u_mail) || empty($u_pass)) {
         $errors[] = 'all fields are required';
     }
     if (!empty($errors)) {
      foreach ($errors as $error) {
          echo validation_errors($error);
      }
  } else {

      $sql = " UPDATE users SET u_username = '$u_name' , u_password = '$u_pass' , u_fname = '$u_fname', u_lname ='$u_lname', u_email='$u_mail', u_role='$u_role'  ";
      $sql .= " WHERE u_username = '{$userName}' ";
      $executeSql = query($sql);
      confirm($executeSql);
      if ($executeSql) {

          $_SESSION['success'] = 'user has been updated successfully';
          Redirect_to('profile.php');
      }
  }


  }


  }
