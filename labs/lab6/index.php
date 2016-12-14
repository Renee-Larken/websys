<?php 
  abstract class Operation {
    protected $operand_1;
    protected $operand_2;
    public function __construct($o1, $o2) {
      // Make sure we're working with numbers...
      if (!is_numeric($o1) || !is_numeric($o2)) {
        throw new Exception('Non-numeric operand.');
      }
      
      $this->operand_1 = $o1;
      $this->operand_2 = $o2;
    }
    public abstract function operate();
    public abstract function getEquation(); 
  }

  class Addition extends Operation {
    public function operate() {
      return $this->operand_1 + $this->operand_2;
    }
    public function getEquation() {
      return "<span>" . $this->operand_1 . ' + ' . $this->operand_2 . ' = ' . $this->operate() . "</span>";
    }
  }


// Part 1 - Add subclasses for Subtraction, Multiplication and Division here
  class Subtraction extends Operation {
    public function operate() {
      return $this->operand_1 - $this->operand_2;
    }
    public function getEquation() {
      return "<span>" . $this->operand_1 . ' - ' . $this->operand_2 . ' = ' . $this->operate() . "</span>";
    }
  }

  class Multiplication extends Operation {
    public function operate() {
      return $this->operand_1 * $this->operand_2;
    }
    public function getEquation() {
      return "<span>" . $this->operand_1 . ' x ' . $this->operand_2 . ' = ' . $this->operate() . "</span>";
    }
  }

  class Division extends Operation {
    public function operate() {
      return $this->operand_1 / $this->operand_2;
    }
    public function getEquation() {
      return "<span>" . $this->operand_1 . ' / ' . $this->operand_2 . ' = ' . $this->operate() . "</span>";
    }
  }
  
  // I chose to create 2-length arrays for these last two to keep from adding too much additional code to suit the original coding outlines. 
  class Cube extends Operation {
    public function operate() {
      $array = [0 => $this->operand_1 ** 3, 1 => $this->operand_2 **3,];
      return $array;
    }
    public function getEquation() {
      return "<span>" . $this->operand_1 . '^3 = ' . $this->operate()[0] . "</span>\n<span>" . $this->operand_2 . '^3 = ' . $this->operate()[1] . "</span>";
    }
  }
  
  // Recursion code used here for convenience.
  class Factorial extends Operation {
    public function operate() {
      $array = [0 => $this->factor($this->operand_1), 1 => $this->factor($this->operand_2)];
      return $array;
    }
    private function factor($num) {
      if ($num < 2) {
        return 1;
      }
      else {
        return $num * $this->factor($num - 1);
      }
    }
    public function getEquation() {
      return "<span>" . $this->operand_1 . '! = ' . $this->operate()[0] . "</span>\n<span>" . $this->operand_2 . '! = ' . $this->operate()[1] . "</span>";
    }
  }


// End Part 1



// Check to make sure that POST was received 
// upon initial load, the page will be sent back via the initial GET at which time
// the $_POST array will not have values - trying to access it will give undefined message

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $o1 = $_POST['op1'];
    $o2 = $_POST['op2'];
  }
  $err = Array();


// Part 2 - Instantiate an object for each operation based on the values returned on the form
//          For example, check to make sure that $_POST is set and then check its value and 
//          instantiate its object
// 
// The Add is done below.  Go ahead and finish the remiannig functions.  
// Then tell me if there is a way to do this without the ifs

  try {
    if (isset($_POST['add']) && $_POST['add'] == 'Add \'Em Up') {
      $op = new Addition($o1, $o2);
    }
// using so many if and else if statements is frowned upon, but I want the code to stop checking for cases as soon as it hits a correct choice.
    else if (isset($_POST['sub']) && $_POST['sub'] == 'Subtract') {
      $op = new Subtraction($o1, $o2);
    }
    else if (isset($_POST['mult']) && $_POST['mult'] == 'Multiply') {
      $op = new Multiplication($o1, $o2);
    }
    else if (isset($_POST['div']) && $_POST['div'] == 'Just Divide') {
      $op = new Division($o1, $o2);
    }
    else if (isset($_POST['cube']) && $_POST['cube'] == 'Cube \'Em') {
      $op = new Cube($o1, $o2);
    }
    else if (isset($_POST['fact']) && $_POST['fact'] == 'Factorial') {
      $op = new Factorial($o1, $o2);
    }
// End of Part 2   /\

  }
  catch (Exception $e) {
    $err[] = $e->getMessage();
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>A Lark's Calculator</title>
    <link type="text/css" rel="stylesheet" href="./resources/calc.css"/>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
  </head>
  <body>
    <header>
      <h2>SWEET CALCULATOR, BRO!</h2>
      <p>Here's a little calculator to have fun with! Make sure to fill in both blanks before you submit ~ .</p>
    </header>
    <main>
      <pre id="result">
        <?php
          if (isset($op)) {
            try {
              echo $op->getEquation();
            }
            catch (Exception $e) {
              $err[] = $e->getMessage();
            }
          }

          foreach($err as $error) {
            echo $error;
          }
        ?>
      </pre>

      <form method="post" action="index.php">
        <input type="text" name="op1" id="name" value="" placeholder="1st value" autocomplete="off"/>
        <input type="text" name="op2" id="name" value="" placeholder="2nd value" autocomplete="off"/>
        <br/>
        <!-- Only one of these will be set with their respective value at a time -->
        <input type="submit" name="add" value="Add 'Em Up" />  
        <input type="submit" name="sub" value="Subtract" />  
        <input type="submit" name="mult" value="Multiply" />  
        <input type="submit" name="div" value="Just Divide" />  
        <input type="submit" name="cube" value="Cube 'Em" />    
        <input type="submit" name="fact" value="Factorial" />    
      </form>
    </main>
  </body>
</html>

