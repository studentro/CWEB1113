using System;

namespace Lab2Q1
{
    class Program
    {
        static void Main(string[] args)
        {
            int myNum = 3;
            Console.WriteLine("enter a number to test=" + myNum);

            Console.WriteLine("Using multiply Assignment operator to multiply 5 to myNum...");
            myNum *= 5;

            Console.WriteLine("Updated Value of myNum=" + myNum);
        }
    }
}
 