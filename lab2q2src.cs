using System;

namespace lab2Q2
{
    class Program
    {
        static void Main(string[] args)
        {
            int myNum = -2;
            Console.WriteLine("enter a number to test=" + myNum);

            Console.WriteLine("Using multiply Assignment operator to multiply 6 to myNum...");
            myNum *= 6;

            Console.WriteLine("Updated Value of myNum=" + myNum);
        }
    }
}
