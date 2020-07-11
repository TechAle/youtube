## Librerie
import numpy as np
from matplotlib import pyplot as plt
from matplotlib.animation import FuncAnimation

## Creo un subplot con 2 assi
fig, (ax1, ax2) = plt.subplots(2,1)
## Inserisco i vari label
ax1.set_ylabel("Coseno")
ax2.set_ylabel("Seno")
ax2.set_xlabel("Tempo")

## Per ogni asse setto minimi e massimi
for ax in [ax1, ax2]:
    ax.set_ylim(-1.5, 1.5)
    ax.set_xlim(0, 4)

## Funzione che viene chiamata prima di FuncAnimation
def init():
    global line
    ## Linea del seno
    line1, = ax1.plot([], [], lw=3, color = 'g')
    ## Linea del coseno
    line2, = ax2.plot([], [], lw=3, color = 'r')
    ## Unisco le linee in un array
    line = [line1, line2]
    return line

## Funzione che serve per l'animazione
def animate(i):
    ## Prendo i valori dallo 0 fino al 4
    x = np.linspace(0, 4, 1000)
    ## Trovo il seno di x
    y_sin = np.sin((x - ( 0.01 * i ) ))
    ## Trovo il coseno di x
    y_cos = np.cos((x - ( 0.01 * i ) ))
    ## Metto i dati del coseno nel grafico
    line[0].set_data(x, y_sin)
    ## Metto i dati del seno nel grafico
    line[1].set_data(x, y_cos)
    return line

'''
    fig è la figura a cui si fà riferimento
    animate è la funzione che svolge la funzione di Animazione
    init è la prima funzione che esegue FuncAnimation prima di iniziare con animate
'''
anim = FuncAnimation(fig, animate, init_func=init,
                                interval=10, blit=True)
## Rendo la grafica più pulita
plt.tight_layout()
## Mostro
plt.show()
