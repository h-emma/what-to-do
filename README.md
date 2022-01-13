<img src='https://media.giphy.com/media/3oz8xUFUB65tXgvHwI/giphy.gif' width=100%>

# What to do

The goal with this project is to build a website where a user can create an account, login, add list and task and then delete and logout. 

# Installation


To install this project follow this list
- Clone the project
```
git clone https://github.com/h-emma/what-to-do
```
- Start php server ```php -S localhost:8000```
 
- Open up you browser and paste in this link:
```http://localhost:8000/```

# Code Review

Code review written by [Simon Helier](https://github.com/Sakariash).

1. `Register.php:general` - Make sure a secure password is needed when creating an account.
2. `Register.php:general` - Check if the email is aldready registered before creating an account.
3. `Create.php:general` - Able to set deadline date prior to todays date, for user experiance this should be fixed.
4. `Create.php:9` - Always remember to validate input.
5. `Update.php:10` - Always remember to validate input.
6. `General` - Great file structure but multiple files is named the same, try giving them a little more explaning name e.g., delete-list / delete-task.
7. `Create.php:8-12` - When declaring your variables with the `$_POST` values the extra parentheses around `$_POST['']` unnecessary.
8. `Completed.php:8-11` - As above.
9. `General` - For a better user experience try to interact a little more with the user. This can be done by sending a session message and let the user know what happened after they pushed a button.
10. `General` - Have a click effect on all buttons to make it clear to the user something is happening.

# Testers

Tested by the following people:

1. Sofia Dersén
2. Nelly Svarvare Petrén
