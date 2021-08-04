import threading

import requests

ip = ""
data = {

}
nThreads = 40
nFor = 1

def main():
    th = []
    for i in range(nThreads):
        th.append(threading.Thread(target=post))

    for i in range(nThreads):
        th[i].start()

    for i in range(nThreads):
        th[i].join()


def post():
    for i in range(nFor):
        r =requests.post(ip,
                      data=data)
        if r != 200:
            print("Errore")


if __name__ == '__main__':
    main()
