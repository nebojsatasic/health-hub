pipeline {
    agent any

    environment {
        GITHUB_REPO = 'https://github.com/nebojsatasic/health-hub.git'
        DEPLOY_DIR = '/var/www/html'
    }

    stages {
        stage('Checkout') {
            steps {
                script {
                    // Clone or pull from GitHub repository
                    git url: "${GITHUB_REPO}", credentialsId: '', branch: 'main'
                }
            }
        }

        stage('Deploy') {
            steps {
                script {
                    // Copy files containing sensitive data from the secure location to ensure that sensitive information is not exposed in the Git repository
                    sh 'sudo cp /var/secure_data/health_hub/docker-compose.yml ${WORKSPACE}/docker-compose.yml'
                    sh 'sudo cp /var/secure_data/health_hub/config.php ${WORKSPACE}/src/app/config/config.php'

                    // Navigate to the workspace directory
                    sh 'cd ${WORKSPACE}'

                    // Run the Docker containers
                    sh 'sudo docker compose up -d'
                }
            }
        }
    }

    post {
        always {
            echo 'Deployment complete.'
        }
    }
}
