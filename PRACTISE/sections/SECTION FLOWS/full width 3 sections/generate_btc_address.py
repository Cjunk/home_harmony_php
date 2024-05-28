from bitcoin import *

# Generate a random private key
my_private_key = random_key()
print("Private Key: %s" % my_private_key)

# Generate the corresponding public key
my_public_key = privtopub(my_private_key)
print("Public Key: %s" % my_public_key)

# Generate a new Bitcoin address from the public key
my_bitcoin_address = pubtoaddr(my_public_key)
print("New Bitcoin Address: %s" % my_bitcoin_address)
