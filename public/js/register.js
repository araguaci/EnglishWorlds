$('.ui.form')
  .form({
    on: 'blur',
    fields: {
      match: {
        identifier  : 'password_confirmation',
        rules: [
          {
            type   : 'match[password]',
            prompt : 'Please confirm that the passwords match'
          }
        ]
      },
      username: {
        identifier : 'name',
        rules: [
          {
            type : 'empty',
            prompt : 'Please enter a unique username'
          }
        ]
      },
      email: {
        identifier : 'email',
        rules: [
          {
            type : 'email',
            prompt : 'Please enter a correct email'
          }
        ]
      },
      password: {
        identifier : 'password',
        rules: [
          {
            type : 'empty',
            prompt : 'Please enter a password'
          },
          {
            type : 'minLength[6]',
            prompt : 'Your password must be at least {ruleValue} characters'
          }
        ]
      }
    }
  });
