This repository is a very simple demo about logging channel (with monolog within symfony) and handlers to change the path of a channel.

[Symfony docs - Logging](https://symfony.com/doc/5.4/logging.html)\
[How to Log Messages to different Files](https://symfony.com/doc/5.4/logging/channels_handlers.html)\
[Symfony docs - Service Container (Choose a Specific Service)](https://symfony.com/doc/5.4/service_container.html#choose-a-specific-service)\

# Define custom channel
In `config/package/monolog.yaml` you can define custom channels.

# Define custom handlers
In order to define a custom output, we need to define a custom handlers in `config/package/monolog.yaml`.

# Define the channel of your LoggerInterface
You can redefine the auto wiring of construct method within the `config/services.yaml` file, or take advantage of autowiring by naming the `LoggerInterface` parameter that is autowiried to your Controller or Service.