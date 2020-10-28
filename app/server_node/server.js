let io = require('socket.io')(6001)
console.log('connected to port 600')

io.on('error', function (socket) {
    console.log('error')
})
io.on('connection', function (socket) {
    console.log('co nguoi da ket noi' + socket.id)
})
let Redis = require('ioredis')
let redis = new Redis(1000)
redis.psubscribe("*", function (error, count) {

})
redis.on('pmessage', function (partner, channel, message) {

    console.log(channel)
    // console.log(message)
    message = JSON.parse(message)
    io.emit(channel+":"+message.event,message.data.message)
    // console.log(message.data.message)
})
