
class Program
{

    public class Computer
{
    public string CPU { get; set; }
    public string GPU { get; set; }
    public int RAM { get; set; }
    // Ostale karakteristike...

    public void DisplayInfo()
    {
        Console.WriteLine($"Computer with CPU: {CPU}, GPU: {GPU}, RAM: {RAM}GB");
    }
}

public interface IComputerBuilder
{
    void SetCPU();
    void SetGPU();
    void SetRAM();
    Computer GetComputer();
}

public class GamingComputerBuilder : IComputerBuilder
{
    private Computer computer = new Computer();

    public void SetCPU()
    {
        computer.CPU = "High-end gaming CPU";
    }

    public void SetGPU()
    {
        computer.GPU = "Powerful gaming GPU";
    }

    public void SetRAM()
    {
        computer.RAM = 16;
    }

    public Computer GetComputer()
    {
        return computer;
    }
}

public class OfficeComputerBuilder : IComputerBuilder
{
    private Computer computer = new Computer();

    public void SetCPU()
    {
        computer.CPU = "Standard office CPU";
    }

    public void SetGPU()
    {
        computer.GPU = "Basic office GPU";
    }

    public void SetRAM()
    {
        computer.RAM = 8;
    }

    public Computer GetComputer()
    {
        return computer;
    }
}

public class Director
{
    public Computer BuildComputer(IComputerBuilder builder)
    {
        builder.SetCPU();
        builder.SetGPU();
        builder.SetRAM();
        return builder.GetComputer();
    }
}


static void Main()
{
    // Stvaranje direktora
    Director director = new Director();

    // KoriĹˇtenje GamingComputerBuilder-a
    IComputerBuilder gamingComputerBuilder = new GamingComputerBuilder();
    Computer gamingComputer = director.BuildComputer(gamingComputerBuilder);

    // Prikazivanje informacija o gaming raÄŤunalu
    gamingComputer.DisplayInfo();

    Console.WriteLine();

    // KoriĹˇtenje OfficeComputerBuilder-a
    IComputerBuilder officeComputerBuilder = new OfficeComputerBuilder();
    Computer officeComputer = director.BuildComputer(officeComputerBuilder);

    // Prikazivanje informacija o uredskom raÄŤunalu
    officeComputer.DisplayInfo();

    Console.ReadLine(); // ÄŚekanje da korisnik pritisne Enter prije zatvaranja konzole
}

}
