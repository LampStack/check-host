# 🌟✨ PHP Class for Check-Host.net ✨🌟

This PHP class allows you to leverage Check-Host.net's features for (HTTP | UDP | TCP | DNS | Ping) checks.

## Features

### 1. Ping Check:
You can check the Ping of a domain using the following code:

```php
$checkHost = new CheckHost();
echo $checkHost->checkPing('https://domain.com', 0, null);
```

- **Domain**: The domain you want to check.
- **Max Nodes**: Use `0` for all nodes.
- **Nodes**: Use `null` for default nodes, or specify your own.

### 2. Fetching Results:
After getting the `request_id`, you can retrieve the results using:

```php
echo $checkHost->CheckResult("1607f590k2a9");
```

### 3. Other Checks:
You can use similar methods for TCP, HTTP, DNS, and UDP checks:

- **TCP**: `checkTCP($hostname, $maxNodes, $nodes)`
- **HTTP**: `checkHTTP($hostname, $maxNodes, $nodes)`
- **DNS**: `checkDNS($hostname, $maxNodes, $nodes)`
- **UDP**: `checkUDP($hostname, $maxNodes, $nodes)`

### 4. Retrieving Node Information:
You can fetch the node details with the following methods:

```php
echo $checkHost->NodesHosts(); // List of nodes
echo $checkHost->NodesIPs();   // List of node IPs
```

## How to Use
1. Clone this repository.
2. Include the PHP class in your project.
3. Use the methods as described above for the different types of checks.

## License
This project is licensed under the MIT License.

---

Enjoy using this class to interact with Check-Host.net's powerful network tools! 🚀

## Contact

<a href="https://t.me/LampStack">Telegram</a><br>
<a href="mailto:xialop@outlook.com">Email</a>
