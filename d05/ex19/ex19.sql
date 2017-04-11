SELECT ABS(DATEDIFF(MIN(historique_membre.date), MAX(historique_membre.date))) as uptime FROM historique_membre;
