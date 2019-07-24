def get_config():
	config = {}

	for line in open("config.txt", "r").readlines():
		key, value = line.split()

		config[key] = value

	return config