import socket


IP = socket.gethostbyname(socket.gethostname())
PORTA = 9000
ADDR = (IP, PORTA)

CLIENT = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

FORMAT = "utf-8"
LEN_MSG = 64
print("connetto")
CLIENT.connect(ADDR)
print("connesso")
