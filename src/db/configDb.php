<?php
$conn = new PDO('mysql:host=localhost;dbname=meuBancoDeDados', $username, $password);

TORM\Connection::setConnection($con);
TORM\Connection::setDriver("mysql");

// define your models - an User class will connect to an users table
class User extends TORM\Model {};
class Ticket extends TORM\Model {};

// create some validations
User::validates("name",  ["presence"     => true]);
User::validates("email", ["presence"     => true]);
User::validates("email", ["uniqueness"   => true]);
User::validates("id",    ["numericality" => true]);

// create some relations
User::hasMany("tickets");
User::hasOne("account");
Ticket::belongsTo("user");

// this will create a new user
$user = new User();
$user->name  = "John Doe";
$user->email = "john@doe.com";
$user->level = 1;
$user->save();

// this will find the user using its primary key
$user = User::find(1);

// find some users
$users = User::where(["level" => 1]);

// find some users, using more complex expressions
// the array first element is the query, the rest are values
$users = User::where(["level >= ?", 1]); 

// updating users
User::where(["level" => 1])->updateAttributes(["level" => 3]);

// using fluent queries
$users = User::where(["level" => 1])->limit(5)->order("name desc");

// listing the user tickets
foreach($user->tickets as $ticket) {
   echo $ticket->description;
}

// show user account info
echo $user->account->number; 

?>