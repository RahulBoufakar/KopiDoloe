import csv


class Item():
    pay_rate = 0.8 # The pay rate afte 20% sale
    all =[]

    #constructor
    def __init__(self, name: str, price: float, quantity=0):
        # Run validations to the received argguments
        assert price >= 0, f"Price {price} is not greater than or equal to zero"
        assert quantity >= 0, f"Quantitiy {quantity} is not greater than or equal to zero"

        # Assign to self object
        self.name = name
        self.price = price
        self.quantity = quantity 

        # Action to Excecute

        # Add instance to list of the instance
        Item.all.append(self)

    # Generate total price
    def calculate_total_price(self):
        return self.price * self.quantity
    
    # Apply a discount based on pay_rate
    def apply_discount(self):
        self.price *= self.pay_rate

    
    # Change Instantiate_from_csv into class method
    @classmethod
    def instantiate_from_csv(cls): # Method to convert and add content in csv file into instance attribute
        with open('Items.csv', 'r') as f:
            reader = csv.DictReader(f)  # Convert and add content in csv file as dict
            items = list(reader)    # Add content in csv file as list items

            for item in items:
                Item(
                    name = item.get('name'),
                    price = float(item.get('price')),
                    quantity = int(item.get('quantity')),
                )
    @staticmethod
    def is_integer(num):
        # Count out the floats that are point zero
        if isinstance(num, float):
            # Count out the floats that are point zero
            return num.is_integer()
        elif isinstance(num, int):
            return True
        else:
            return False

    # Change represent format of the object
    def __repr__(self):
        return f"{self.__class__.__name__}('{self.name}', {self.price}, {self.quantity})"

class Phone(Item):
    def __init__(self, name: str, price: float, quantity=0, broken_phones = 0):
        # Call to super function to have access to all attributes / methods
        super().__init__(
            name, price, quantity
        )
        # Run validations to the received argguments
        assert broken_phones >= 0, f"Broken Phones {broken_phones} is not greater than or equal to zero"

        # Assign to self object
        self.broken_phones = broken_phones

phone1 = Phone("jscPhonev10", 500, 5, 1)
phone2 = Phone("jscPhonev20", 700, 5, 1)

print(Item.all)
print(Phone.all)