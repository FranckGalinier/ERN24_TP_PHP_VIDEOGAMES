SELECT console.id, console.label, COUNT(game_console.jeu_id) AS total 
FROM console
INNER JOIN game_console ON console.id = game_console.console_id
GROUP BY console.id

SELECT * FROM jeu
inner join note ON note.id = jeu.note_id
ORDER BY note_utilisateur DESC
