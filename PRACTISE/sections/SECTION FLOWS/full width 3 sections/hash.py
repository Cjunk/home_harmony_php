from hashlib import sha256

# Original binary for "cats" and adding '1' at the end of the binary
binary_sequence = "1100011 1100001 1110100 1110011".replace(" ", "") + "1"
# Convert binary sequence to bytes
bytes_data = int(binary_sequence, 2).to_bytes((len(binary_sequence) + 7) // 8, 'big')
# Convert bytes to a string if it's valid ASCII (might not be straightforward or correct)
try:
    text_string = bytes_data.decode('ascii')
    hash_result = sha256(text_string.encode('utf-8')).hexdigest()
except UnicodeDecodeError:
    hash_result = "Binary sequence does not decode to valid ASCII text."

print(hash_result)

