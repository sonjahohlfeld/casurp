import unittest

def fun(x):
    return x + 1

class MyTest(unittest.TestCase):
    def test(self):
        self.assertEqual(fun(3), 4)

suite = unittest.TestLoader().loadTestsFromTestCase(MyTest)
unittest.TextTestRunner(verbosity=2).run(suite)
