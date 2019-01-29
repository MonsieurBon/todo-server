# Domain
Todo App

## Bounded Context: Manage Account

### Aggregate: User

#### Commands and Events

Command          | Event             | Follow up command
-----------------|-------------------|-------------------
signup user      | account created   | add new tasklist
login            | user logged in    | 
logout           | user logged out   |
remove account   | account removed   | unshare tasklist?

## Bounded Context: Work

### Aggregate: Tasklist

#### Commands and Events

Command          | Event
-----------------|--------------------------
add new tasklist | tasklist added
|                | task added
rename tasklist  | tasklist renamed
share tasklist   | tasklist shared
|                | tasklist shared with you
add new task     | task added
update task      | task updated
|                | task finished
 