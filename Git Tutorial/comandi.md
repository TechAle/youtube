# Commandi Git

## Configurazione
git config --global user.name “[username]”\
git config --global user.email “[email]”

[Per Sublime Merge]\
git config mergetool.smerge.cmd 'smerge mergetool "$BASE" "$LOCAL" "$REMOTE" -o "$MERGED"'\
git config mergetool.smerge.trustExitCode true\
git config merge.tool smerge


git config --list\
## Creazione
git init\
git clone [url]\
Acquisizione\
git remote add [nome] [url]\
git remote -v (vedo tutti i remote)\
git pull [nome remote] [branch]\
## Aggiungo
git add [file]\
-A (tutti negli staged)\
-A [directory] (tutti staged in una directory]\
--no-all (tutti tranne i rimossi)\
-u (tutti tranne i nuovi\
. (tutti nella directory corrente e nelle sotto directory\
git mv [file] [directory/nuovo nome]\
Push\
git push [remote dove] [branch]


## Branch
git branch [nome] (crea branch)\
git checkout [nome] (spostati a un branch)\
git branch -d (delete after merge) -D (delete without merging) [nome] (elimina branch)\
git push (remoto) --delete [nome] (elimina branch in remoto)\
git cherry-pick (id branch] (prendi un commit e lo metti nel branch)\
git branch -a (mostra tutti i branch)

## Informazione
git status (vedi lo staged area)\
git log (vedi i log dei vari commit) --oneline --log

## Ripristini
git restore --staged (ripristina da staged)\
git restore --source=[id commit] (ripristina da commit)\
git stash --save [nome] (crea un nuovo stash)\
git stash --list (mostra tutti gli stash)\
git stash apply stash@{0} (ripristina uno stash)\
git stash drop stash@{0} / git stash clear (elimina uno stash) \
Git checkout . 
