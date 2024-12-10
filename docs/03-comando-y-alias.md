# Comando phpunit

## Flags

- `--colors`
- Indicar nombre de la clase --filter FactorialTes
- Indicar nombre de método --filter testFactorialZero
- `--log-junit report.xml`
- `--testdox-html file.html`

## Alias de vendor/bin/phpunit

### En Linux o macOS

Archivo de configuración del shell:

Para **bash**: `~/.bashrc`
Para **zsh**: `~/.zshrc`

```bash
alias phpunit='./vendor/bin/phpunit'
```

Reinicia el terminal!!

### En Windows 

Puedes usar un terminal basado en bash.

PowerShell perfil de usuario:

```powershell
notepad $PROFILE
```

```powershell
function phpunit { ./vendor/bin/phpunit.exe @args }
```
