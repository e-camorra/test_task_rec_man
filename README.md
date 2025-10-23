## 🚀 Installation & Setup

Example for running the project locally:
##  Requirements
 - docker environment

```bash
# Clone the repository
git clone https://github.com/e-camorra/test_task_rec_man
cd test_task_rec_man/app

# Copy environment
cp .env.example .env

# Put local db config
DB_HOST=db
DB_NAME=app_db
DB_USER=app_user
DB_PASSWORD=app_pass
DB_CHARSET=utf8mb4

# Build containers
cd ..
docker-compose up -d

# Setup namespaces
docker ps (show list with containers)
docker exec -it {container_id} bash
composer dump-autoload

# Run migrations (inside container)
php database/migrations/migrate.php 

