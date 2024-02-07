using System;

// Produkt
public interface IVozilo
{
    void Vozi();
}

// KonkretniProduktA
public class Automobil : IVozilo
{
    public void Vozi()
    {
        Console.WriteLine("Vožnja automobila");
    }
}

// KonkretniProduktB
public class Bicikl : IVozilo
{
    public void Vozi()
    {
        Console.WriteLine("Vožnja bicikla");
    }
}

// Tvornica
public interface IProvizija
{
    IVozilo IznajmiVozilo();
}

// KonkretnaTvornicaA
public class ProvizijaZaAutomobile : IProvizija
{
    public IVozilo IznajmiVozilo()
    {
        return new Automobil();
    }
}

// KonkretnaTvornicaB
public class ProvizijaZaBicikle : IProvizija
{
    public IVozilo IznajmiVozilo()
    {
        return new Bicikl();
    }
}

// Klijent
class Program
{
    static void Main()
    {
        Console.WriteLine("Što želite iznajmiti?");
        Console.WriteLine("1. Automobil");
        Console.WriteLine("2. Bicikl");

        string odabir = Console.ReadLine();

        IProvizija provizija;
        if (odabir == "1")
        {
            provizija = new ProvizijaZaAutomobile();
        }
        else if (odabir == "2")
        {
            provizija = new ProvizijaZaBicikle();
        }
        else
        {
            Console.WriteLine("Pogrešan odabir. Molimo unesite 1 ili 2.");
            return;
        }

        IVozilo vozilo = provizija.IznajmiVozilo();
        vozilo.Vozi();
    }
}
