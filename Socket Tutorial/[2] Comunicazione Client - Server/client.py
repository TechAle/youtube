import socket

def send(msg):
    message = msg.encode(FORMAT)
    msg_len = str(len(message)).encode(FORMAT)
    msg_len += b' ' * (LEN_MSG - len(msg_len))
    CLIENT.send(msg_len)
    CLIENT.send(message)

IP = socket.gethostbyname(socket.gethostname())
PORTA = 9000
ADDR = (IP, PORTA)

CLIENT = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

FORMAT = "utf-8"
LEN_MSG = 64
print("connetto")
CLIENT.connect(ADDR)
print("connesso")


while True:
    msg_len = CLIENT.recv(LEN_MSG).decode(FORMAT)
    if msg_len:
        msg = CLIENT.recv(int(LEN_MSG)).decode(FORMAT)
        print("ricevuto " + msg)
