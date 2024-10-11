## Desafio: Sistema de Gestão de Tarefas

Objetivo: Desenvolver uma aplicação web simples de gerenciamento de tarefas que permita aos usuários criar, visualizar, atualizar e excluir tarefas. O projeto deve ser feito utilizando as tecnologias solicitadas e disponibilizado no GitHub, rodando em um ambiente Docker.

### Metodologias Ágeis:

- [RoadMap](RoadMap.pdf)
- [Backlog](Backlog.pdf)
- [Sprint](Sprints.pdf)
- [Relatório](Relatório.pdf)

## Como rodar o projeto:

No terminal rode os seguintes comandos:

1. **Build Docker**
```
docker compose -f deploy/docker-compose.yml --env-file ./.env up --build
```

2. **Migrate Database**
```
docker exec -t laravelapp php artisan migrate
```

3. **Test Unitário**
```
docker exec -t laravelapp php artisan test
```

4. **Test Frontend**

Para acessar o front, utilize o seguinte link: http://localhost:8080
