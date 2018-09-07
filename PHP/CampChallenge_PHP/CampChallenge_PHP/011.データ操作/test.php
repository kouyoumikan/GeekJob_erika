<?php
  header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html>
<head><title>test.php</title>
  <!-- PHP -->
  <?php
    session_start();
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['seibetu'] = $_POST['seibetu'];
    $_SESSION['shumi'] = $_POST['shumi'];
  ?>
</head>
<body>
  <!-- PHP -->
<?php
<tbody>
                          <tr>
                              <td>[お名前]:</td>
                              <td>
                                  <?php echo $_SESSION['name']; ?>
                              </td>
                          </tr>
                          <tr>
                              <td>[性別]:</td>
                              <td>
                                  <?php echo $_SESSION['seibetu']; ?>
                              </td>
                          </tr>
                          <tr>
                              <td>[趣味]:</td>
                              <td>
                                  <?php echo $_SESSION['shumi'] ?>
                              </td>
                          </tr>

                      </tbody>
?>
</body>
</html>
