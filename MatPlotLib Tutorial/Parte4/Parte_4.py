## Librerie
import numpy as np
from matplotlib import pyplot as plt
from matplotlib.animation import FuncAnimation

## Creo il subplot
fig, ax = plt.subplots(1,1)
## Setto i limiti
ax.set_ylim(-1.5, 1.5)
ax.set_xlim(0, 4)

## Funzione che viene chiamata prima di FuncAnimation
def init():
    global line
    ## Creo la linea che animeremo
    line, = ax.plot([], [], lw=3)
    return line,

## Funzione che serve per l'animazione
def animate(i):
    ## Prendo i valori dallo 0 fino al 4
    x = np.linspace(0, 4, 1000)
    ## Prendo il seno di x
    y = np.sin((x - ( 0.01 * i ) ))
    ## Li metto nel grafico
    line.set_data(x, y)
    return line,

'''
    fig è la figura a cui si fà riferimento
    animate è la funzione che svolge la funzione di Animazione
    init è la prima funzione che esegue FuncAnimation prima di iniziare con animate
'''
anim = FuncAnimation(fig, animate, init_func=init,
                                interval=10, blit=True)
## Mostro
plt.show()
