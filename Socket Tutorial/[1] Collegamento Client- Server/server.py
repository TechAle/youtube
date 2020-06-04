import socket


IP = socket.gethostbyname(socket.gethostname())
PORTA = 9000
ADDR = (IP, PORTA)

SERVER = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

FORMAT = "utf-8"
LEN_MSG = 64

SERVER.bind(ADDR)
print("ascolto")
SERVER.listen()

conn, addr = SERVER.accept()
print(f"accettato {addr}")
