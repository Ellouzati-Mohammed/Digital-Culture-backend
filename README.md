# Projet Laravel - Digital-Culture-backend

## Description

Digital-Culture-backend est le service API REST développé avec Laravel.  
Il expose les endpoints nécessaires au frontend React pour gérer les utilisateurs, contenus et interactions.

---

## Prérequis

- PHP 8.0+  
- Composer  
- Base de données (MySQL)  

---

## Installation

1. **Cloner le dépôt :**  
   ```bash
   git clone https://github.com/Ellouzati-Mohammed/Digital-Culture-backend
   cd Digital-Culture-backend
   ```

 2. **Installer les dépendances Composer :** 
 ```bash
  composer install
 ```

 3. **Créer et configurer le fichier .env :** 
 ```bash
  cp .env.example .env
 ```

4. **Générer la clé d’application :** 
 ```bash
  php artisan key:generate
 ```

5. **Exécuter les migrations et seeders :** 
 ```bash
  php artisan migrate --seed
 ```

6. **Lancer le serveur :** 
 ```bash
  php artisan serve
 ```


