principal = float(input("enter the principal:: "))
rate = float(input("enter the rate:: "))
time = float(input("enter the time:: "))

amount = principal * ((1 + rate / 100.0)** time)
interest = amount - principal

print()
print("amount %.2f" %amount)
print("interest %.2f" %interest)
