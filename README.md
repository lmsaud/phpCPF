# phpCPF

PHP class used to check if a given CPF number is valid and also get the brazilian state of the cpf number

## Usage

```
$cpf = new CPF(PUT_CPF_DIGITS_HERE);
if($cpf->isValid()) {
  echo "CPF is OK";
}
else {
  echo "CPF is NOT OK";
}

$uf = $cpf->getUF();
echo "STATE OF ORIGIN: " + $uf;

```
