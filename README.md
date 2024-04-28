# PHSE
### PHSE is Session Management Library
PHSE is a utility class for managing sessions in PHP applications. It provides methods for adding, updating, removing, and accessing session variables, as well as checking their expiration status.

# Features
* Add: Add a new session variable with a specified key, value, and optional expiration time.
* Update: Update the value of an existing session variable.
* Remove: Remove a session variable with the specified key.
* Get: Retrieve the value of a session variable.
* IsActive: Check if a session variable exists and is active (not expired).
* Expire: Expire a session variable.
* ExpireAll: Expire all session variables.
* RemoveAll: Remove all session variables and destroy the session.
* RegenerateId: Regenerate the session ID.
* GetAll: Retrieve all session variables.
* GetExpiredDetails: Get details of expired session variables.

# Usage
### Adding a Session Variable
To add a new session variable:
```
PHSE::add('username', 'john_doe', 60); // Expires in 60 minutes
```

### Updating a Session Variable
To update the value of an existing session variable:
```
PHSE::update('username', 'jane_doe');
```

### Removing a Session Variable
To remove a session variable with the specified key:
```
PHSE::remove('username');
```

### Retrieving a Session Variable Value
To retrieve the value of a session variable with the specified key:
```
$username = PHSE::get('username');
```

### Checking if a Session Variable is Active
To check if a session variable with the specified key exists and is active (not expired):
```
if (PHSE::isActive('username')) {
    // Session variable is active
} else {
    // Session variable is not active
}
```

### Expiring a Session Variable
To expire a session variable with the specified key:
```
PHSE::expire('username');
```

### Expiring All Session Variables
To expire all session variables:
```
PHSE::expireAll();
```

### Removing All Session Variables
To remove all session variables and destroy the session:
```
PHSE::removeAll();
```

### Regenerating the Session ID
To regenerate the session ID:
```
PHSE::regenerateId();
```

### Retrieving All Session Variables
To retrieve all session variables:
```
$allSessionVariables = PHSE::getAll();
```

### Retrieving Details of Expired Session Variables
To retrieve details of expired session variables:
```
$expiredDetails = PHSE::getExpiredDetails();
```
