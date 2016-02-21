[<-- Back to main section](DOCKER-STARTUP.md)

# Running any php based project

## Create project

- Put your project files into `code/`
- If needed modify `DOCUMENT_ROOT` and `DOCUMENT_INDEX` in `etc/environment*.yml`
- You're done - really

## Cli runner

You can run one-shot command inside the `main` service container:

```bash
docker-compose run --rm main any-php-file.php argument1 argument2
docker-compose run --rm main bash
```

Webserver is available at Port 8000
