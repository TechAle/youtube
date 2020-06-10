import timeit

cy = timeit.timeit('''funz_c_cy.funz(5000)''',setup='import funz_c',number=100)
py = timeit.timeit('''funz_p.funz(5000)''',setup='import funz_p', number=100)

print('{}'.format(py/cy))
