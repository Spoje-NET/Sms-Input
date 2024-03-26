none:

buildimage:
	docker build -f Containerfile  -t vitexsoftware/sms-input:latest .

buildx:
	docker buildx build  -f Containerfile  . --push --platform linux/arm/v7,linux/arm64/v8,linux/amd64 --tag vitexsoftware/sms-input:latest

drun:
	docker run  -f Containerfile --env-file .env vitexsoftware/sms-input:latest
