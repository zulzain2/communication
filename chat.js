const express = require('express');
const app = express();

const server = require('http').createServer(app);

const io = require('socket.io')(server, {
  cors: {
    origin: '*'
  }
});


io.on('connection', (socket) => {
  socket.on('connect_chat', (data) => {
    socket.join(''+data.user_id + data.receiver+'');
    io.in(data.user_id).emit('connected', {
      'message': 'connected'
    })
  })

  socket.on('send_message', (data) => {
    io.to(''+data.receiver_id+data.my_id+'')
    .emit('receive_message', data.message);

    // io.to(data.receiver_id).emit('receive_message', data.message);
    // io.in(data.receiver_id).emit('receive_message', data.message)
  })

  console.log('connected');
  socket.on('disconnect', (socket) => {
    console.log('disconnected');
  });
});

server.listen(3000, () => {
  console.log('server is running');
});
