# Comandi Git
## 1) Configurazione
git config mergetool.smerge.cmd 'smerge mergetool "$BASE" "$LOCAL" "$REMOTE" -o "$MERGED"'\
git config mergetool.smerge.trustExitCode true\
git config merge.tool smerge\
git config --global user.name “[username]”\
git config --global user.email “[email]”\
git config --list
## 2) Creazione
git clone https://github.com/TutorialGitTechAle/primaParte.git\
git init\
(modifica main.py) git status\
git add main.py\
git commit -m “modificato main.py”\
(creo cartella logs) git status (creo file dentro la cartella) git status\
(modifico .gitignore) git status\
git commit -m “aggiunto .gitignore” 

## 3) Remote
git init\
git remote add primo https://github.com/TutorialGitTechAle/primaParte\
git fetch primo\
git pull primo master\
git remote add main https://github.com/TutorialGitTechAle/mainTutorial.git\
git remote update\
git pull server master (errore) git reset --hard server/master\
git remote add update https://github.com/TutorialGitTechAle/mainTutorial.git\
git fetch update\
git remote -v\
git pull update master (readme.md)\
Creo repository in github\
git remote add github (ip)\
git push github master





## 4) Branch
git branch lavoro    |     git branch\
git checkout lavoro (modifiche + git add + git commit)\
git checkout master (modifiche + add + commit)\
git push (github master + lavoro)\
git checkout lavoro + git merge master + possibile conflict\
git push server --delete lavoro (rimani senza branch)

## 5) Analisi and reset
M main.py (git status) C main.py (git diff --staged)\
Ripristiniamo solo il file staged (togliamo l’add) git reset file)\
[modifiche in diversi log] guardiamo log (senza, --oneline, --stat (+inf)) git reflog show --all (comandi)\
git reset --hard head\
git reset --soft [log]\
Crea branch, crea file, ritorna master, git cherry-pick [log]

## 6) Unione && Stash
Creiamo branch, commit, facciamo il merge (git merge master)\
git rebase master\
git stash --save [nome]\
git stash --list\
git stash apply [nome]@{0} \
git stash drop [nome]@{0}

## 7) Alterazioni
git mv\
git add ( .  -a   -u --no-all )\
git clean -df\
git show
