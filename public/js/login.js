$('.ui .form')
  .form({
    on: blur,
    fields: {
      email : 'empty',
      password : ['minLength[6]', 'empty']
    }
  });
